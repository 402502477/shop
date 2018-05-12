var pages = {
    data:{
        host : window.location.origin
    },
    //遮罩
    showLoading()
    {
        var html = '<div id="loading"><div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ripple"><div></div><div></div></div></div><div class="shade"></div></div>';
        $('body').children().before(html);
    },
    hideLoading()
    {
        $('body').children('#loading').remove();
    },
    showConfirm(options)
    {
        var modal = $('#showModal');

        var showCancel = options.showCancel === false ? options.showCancel : true;
        if(!showCancel)
        {
            $('#showModal .cancel').hide();
        }
        modal.find('.modal-title').text(options.title);
        modal.find('.modal-body').text(options.content);

        modal.find('.success').off("click");
        modal.find('.cancel').off("click");

        modal.find('.cancel').click(function(){
            options.success(false);
        });
        modal.find('.success').click(function(){
            options.success(true);
        });
        $('#showModal').modal();

    },
    onReadyStatsChange()
    {
        if(document.readyState === 'interactive')
        {
            pages.showLoading();
        }
        if(document.readyState === 'complete')
        {
            pages.hideLoading();
        }
    },
    //显示通知
    showNotifies(msg , type , from , align)
    {
        var type_text = {
            'info': 'Heads up - ',
            'warning' : 'Warning - ',
            'success' : 'Well done - ',
            'danger' : 'Oh snap - '
        };
        var message = "<b>"+ type_text[type] +"</b>" + msg + '<br/>';
        $.notify({
            message: message

        },{
            type: type,
            timer: 2000,
            placement: {
                from: from ? from : 'bottom',
                align: align ? from : 'right'
            }
        });
    },
    //使用ajax
    onAjaxSubmit(formObj,dataType,callBack,options)
    {
        var that = this;
        that.showLoading();
        var form = $(formObj)[0];
        var data = this._formToData(form);
        var url = form.action;
        var type = form.method;
        $.ajax({
            sync : false,
            url : url ,
            data : data ,
            type : type ,
            dataType : dataType ? dataType : 'json',
            contentType: false,
            processData: false,
            complete(r)
            {
                that.hideLoading();
                var response = r.responseJSON;
                var status = r.status;
                if(status === 200)
                {
                    callBack(options);
                    return that.showNotifies(response.msg,'success');
                }
                that._getResponseError(response.errors);
                return that.showNotifies(response.message,'danger');
            }
        });
        return false;
    },
    onAjax(options)
    {
        var that = this;
        that.showLoading();
        $.ajax({
            sync        :   false,
            url         :   options.url,
            data        :   options.data ? options.data : null,
            type        :   options.type ? options.type : 'get',
            dataType    :   options.dataType ? options.dataType : 'json',
            headers     :   options.headers,
            complete(r)
            {
                options.response({
                    status : parseInt(r.status),
                    status_text : r.statusText,
                    response : r.responseJSON
                });
                return that.hideLoading();
            }
        });
    },
    getProfile(url,data,dataType,type)
    {
        $.ajax({
            url : url ,
            data : data ,
            type : type ? type : 'get' ,
            dataType : dataType ? dataType : 'json',
            success(r)
            {
                $('#aboutMe').html(r.aboutMe?r.aboutMe:'none');
                $('#firstName').html(r.firstName?r.firstName:'none');
                $('#lastName').html(r.lastName?r.lastName:'none');
                $('#contact').html(r.contact?'@'+r.contact:'none');
                $('#department').html(r.department?r.department:'none');
                $('#position').html(r.position?r.position:'none');
                $('#avatar').attr('src',r.avatar?r.avatar:'');
            }
        })
    },
    onErrorAvatar()
    {
        var host = this.data.host;
        var resource = host + '/assets/img/faces/face-0.jpg';
        var object = $('img.avatar,.avatar img');
        for(var i = 0 ; i < object.length ; i ++)
        {
            object.eq(i).attr('onerror','this.src="'+ resource+'"');
        }
    },
    //删除行
    onDestroy(object)
    {
        var obj = $(object)[0];
        var father = $(object).parents('tr');
        var route = obj.dataset.route;
        var id = obj.dataset.id;
        var that = this;
        this.onAjax({
            url : route,
            data : { id : id },
            type : 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            response (res)
            {
                if(res.status !== 200)
                {
                    return that.showNotifies(res.response.message,'danger');
                }
                if(res.response.type === 'success')
                {
                    father.remove();
                }
                return that.showNotifies(res.response.msg,res.response.type);
            }

        });
    },
    //拼装form表单数据
    _formToData(form)
    {
        var data = new FormData();
        var i = 0;
        for (i ; i < form.length ; i ++ )
        {
            if(form[i].name)
            {
                if(form[i].type == 'file')
                {
                    data.append(form[i].name,$(form[i])[0].files[0]);
                }else{

                    data.append(form[i].name,form[i].value);
                }
            }
        }
        return data;
    },
    //遍历ajax返回的错误信息
    _getResponseError(errors)
    {
        var i = null;
        if(errors)
        {
            for(i in errors)
            {
                this.showNotifies(errors[i],'danger')
            }
        }
    },
    test(call)
    {
        $('#showModal').modal();

        $('#showModal .success').click(call);
    }
};

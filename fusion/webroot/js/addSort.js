function addSort(sort) {    
        var floatDiv = "<div id='addSort' title='添加新的种类'>种类名称：<input type='text' id='theName' /></div>";
        $('#detail').append(floatDiv);
    $('#addSort').dialog({
        autoOpen: false,
        height: 150,
        width: 300,
        modal: true,
        show: 'bounce',
        hide: 'drop',
        buttons: {
            "确定" : function() {
                var theName = $('#theName')[0].value;
                if (theName) {
					location.href='/definition/addSort/' + sort + '/'+theName;
                }
                $( this ).dialog( "close" );
            },
            "取消" : function() {
                $( this ).dialog( "close" );
            }
        }
        });
    $('#addSort').dialog('open');
}

function removeSort(sort) {
    var sortID=$("#sortID").val();
	if ($('#remove' + sortID).length == 0) {
        var floatDiv = "<div id='remove"+ sortID +"' title='确认删除种类'>真的要删除吗？</div>";
        $('#detail').append(floatDiv);
    }
    $('#remove' + sortID).dialog({
        autoOpen: false,
        height: 150,
        width: 300,
        modal: true,
        show: 'bounce',
        hide: 'drop',
        buttons: {
            "确定" : function() {
                location.href='/definition/removeSort/' + sort + '/'+sortID;
                $( this ).dialog( "close" );
            },
            "取消" : function() {
                $( this ).dialog( "close" );
            }
        }
        });
    $('#remove' + sortID).dialog('open');
}

function addCSort(sort) {
	var sortID=$("#sortID").val();
        var floatDiv = "<div id='addCSort' title='添加新的子类'>子类名称：<input type='text' id='theCName' /></div>";
        $('#detail').append(floatDiv);
    $('#addCSort').dialog({
        autoOpen: false,
        height: 150,
        width: 300,
        modal: true,
        show: 'bounce',
        hide: 'drop',
        buttons: {
            "确定" : function() {
                var theCName = $('#theCName')[0].value;
                if (theCName) {
					location.href='/definition/addCSort/' + sort + '/'+theCName+ '/'+sortID;
                }
                $( this ).dialog( "close" );
            },
            "取消" : function() {
                $( this ).dialog( "close" );
            }
        }
        });
    $('#addCSort').dialog('open');
}

function removeCSort(sort) {
    var csortID=$("#childID").val();
	if ($('#removeC' + csortID).length == 0) {
        var floatDiv = "<div id='removeC"+ csortID +"' title='确认删除子类'>真的要删除吗？</div>";
        $('#detail').append(floatDiv);
    }
    $('#removeC' + csortID).dialog({
        autoOpen: false,
        height: 150,
        width: 300,
        modal: true,
        show: 'bounce',
        hide: 'drop',
        buttons: {
            "确定" : function() {
                location.href='/definition/removeCSort/' + sort + '/'+csortID;
                $( this ).dialog( "close" );
            },
            "取消" : function() {
                $( this ).dialog( "close" );
            }
        }
        });
    $('#removeC' + csortID).dialog('open');
}
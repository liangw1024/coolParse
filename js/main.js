var layer;
layui.use(['layer', 'form','element'], function(){
  var layer = layui.layer
  ,form = layui.form
  ,element = layui.element;
});
window.onload= onload;
var onload = function(){
	var footer = document.querySelector(".footer");
};
//解析btn click
var btn_parse = document.getElementById('btn-parse');
btn_parse.onclick = function(){
  layui.use('layer', function(){
    layer = layui.layer;
    var i_load_parse = layer.load(3); 
    post();
    //layer.close(index); 
  });    
};

function parse(type,url){

}
function post(){
  var request = new XMLHttpRequest();
  request.open('POST','http://www.baidu.com')
  request.onreadystatechange = function(){
    if(request.readyState==4&&request.status==200){
      //console.log(request.responseText);
    }
  }
  request.send();
}
function get(getobj){
  var xhr = new XMLHttpRequest();
  xhr.open('GET',getobj.url,getobj.asyncs)
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4  && xhr.status == 200){
      getobj.success(xhr.responseText);
    }
  }
  xhr.send();
}

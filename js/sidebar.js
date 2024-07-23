const a = document.getElementById("container");
const c = document.getElementById('side-bar');
const b = a.clientHeight;
const d = c.clientHeight;
console.log(b);
console.log(d);
a.style.height = 87 + 'vh ';
if(b>d){
    c.style.height = b;
}else{
    c.style.height = 'auto';
}
const poc = new URLSearchParams(window.location.search).get("pc");	
console.log(poc);
let address = '';
if (poc == 'kgc'|| poc == 'kgg') address = 'ул. Ярослава Гашека, 7, корп. 1';
if (poc == 'ksg'|| poc == 'kgc'|| poc == 'kgc') address = 'Сибирский тракт, 59';
const divCaption = document.getElementById("div_Caption_id");
divCaption.innerHTML = 'Мы благодарим Вас за то, что Вы воспользовались услугами техцентра Луидор'+' '+address;

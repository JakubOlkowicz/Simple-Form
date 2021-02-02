const title = document.querySelector('#input-title'),
    pseudoCategory = document.querySelector('#pseudo'),
    pseudoImg = document.querySelector('#pseudo-img'),
    money = document.querySelector('#money'),

    validTitle = document.querySelector('#valid-title'),
    validImage = document.querySelector('#valid-img'),
    validCategory = document.querySelector('#valid-category'),
    validMoney = document.querySelector('#valid-money');

function validateForm() {
    let titleValue = document.forms["simple"]["title"].value,
    imageValue = document.forms["simple"]["image"].value,
    categoryValue = document.forms["simple"]["category"].value,
    moneyValue = document.forms["simple"]["money"].value;

    if (titleValue == "" || titleValue < 5) {

        title.classList.add('error');
        validTitle.classList.add('active');
    }
    if (imageValue == "") {

        pseudoImg.classList.add('error');
        validImage.classList.add('active');
    }
    if (categoryValue == "") {

        pseudoCategory.classList.add('error');
        validCategory.classList.add('active');
    }
    if (moneyValue == "") {

        money.classList.add('error');
        validMoney.classList.add('active');

    }
    if (titleValue == "" || imageValue == "" || categoryValue == "" || moneyValue == "") {
        console.log(Value = [
            titleValue, categoryValue, imageValue, moneyValue
        ]);
    }  
}

// Event Listener to remove valid color and valid text
title.addEventListener('click', () => {
    console.log('FOCUS');
    title.classList.remove('error');
    validTitle.classList.remove('active');  
      
});

pseudoImg.addEventListener('click', () => {
    console.log('FOCUS');
    pseudoImg.classList.remove('error');
    validImage.classList.remove('active');    
});

pseudoCategory.addEventListener('click', () => {
    console.log('FOCUS');
    pseudoCategory.classList.remove('error');
    validCategory.classList.remove('active');    
});

money.addEventListener('click', () => {
    console.log('FOCUS');
    money.classList.remove('error');
    validMoney.classList.remove('active');    
  });

// Backend validation 

$(document).ready(function() {
    if (window.location.href.indexOf("money=null") > -1) {
        validMoney.innerHTML = 'Please select money';
        validMoney.classList.add('active');


    } else  if (window.location.href.indexOf("category=null") > -1) {
        validCategory.innerHTML = 'Please select category';
        validCategory.classList.add('active');

    }
    else  if (window.location.href.indexOf("title=null") > -1) {
        validTitle.innerHTML = 'Please select title';
        validTitle.classList.add('active');

    }    
    else  if (window.location.href.indexOf("img=size") > -1) {
        validImage.innerHTML = 'Sorry, your logo is too large';
        validImage.classList.add('active');

    }    
    });
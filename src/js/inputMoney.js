$("input[data-type='currency']").on({
  keyup: function() {
    formatCurrency($(this));
  },
  blur: function() { 
    formatCurrency($(this), "blur");
  }
});


function formatNumber(n) {
// format number 1000000 to 1,234,567
return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
// appends $ to value, validates decimal side
// and puts cursor back in right position.

// get input value
var input_val = input.val();

// don't validate empty input
if (input_val === "") { return; }

// original length
var original_len = input_val.length;

// initial caret position 
var caret_pos = input.prop("selectionStart");

// check for decimal
if (input_val.indexOf(".") >= 0) {

  // get position of first decimal
  // this prevents multiple decimals from
  // being entered
  var decimal_pos = input_val.indexOf(".");

  // split number by decimal point
  var left_side = input_val.substring(0, decimal_pos);
  var right_side = input_val.substring(decimal_pos);

  // add commas to left side of number
  left_side = formatNumber(left_side);

  // validate right side
  right_side = formatNumber(right_side);

  if(right_side.length > 3){ 

    right_side = right_side.substring(2, right_side.length);
  } 
  if (left_side < 5) {
    console.log(left_side);
    left_side = '5';
  }   
  
  // On blur make sure 2 numbers after decimal
  if (blur === "blur") {
    if(right_side.length == 1){
      right_side += "0"

    }
    else if (right_side.length < 1 && left_side != '£'){
      right_side += "00"
    }

    
    while (right_side.length > 2 ){
      right_side = Math.round(right_side / 10);
    }
    if (right_side == 100 ){
      right_side = '00';
      left_side ++;
    }
    console.log(left_side);
}


  // join number by .
  input_val = "£" + left_side + "." + right_side;

} else {
  // no decimal entered
  // add commas to number
  // remove all non-digits
  input_val = formatNumber(input_val);
  input_val = "£" + input_val;

  // final formatting
  if (blur === "blur") {
    input_val += ".00";
  }
}

// send updated string to input
input.val(input_val);

// put caret back in the right position
var updated_len = input_val.length;
caret_pos = updated_len - original_len + caret_pos;
input[0].setSelectionRange(caret_pos, caret_pos);
}
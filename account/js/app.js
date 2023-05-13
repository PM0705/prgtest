$(".hira_change").blur(function () {
    hiraChange($(this));
  });
  
  hiraChange = function (ele) {
    var val = ele.val();
    var hira = val.replace(/[ぁ-ん]/g, function (s) {
      return String.fromCharCode(s.charCodeAt(0) + 0x60)
    });
  
    if (val.match(/[ァ-ン]/g)) {
      $(ele).val(hira)
    }
  };





 
function SeasonSampleB2() {
    var gender = $('[name=gender]:checked').parent('label').text();
    console.log(gender);
}

console.log(323);
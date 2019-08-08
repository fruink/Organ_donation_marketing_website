(function() {
  var whyText = document.querySelector('#why');

  function loadWhy(){
    const url = '../organ_donation_copy/admin/phpscripts/connect.php?why=true';
    fetch(url)
      .then((resp) => resp.json())
      .then((data) => { processResultWhy(data); })
      .catch(function(error) {
        console.log(error);
      });
  }

  function processResultWhy(data){
    const {why_text, why_img} = data[0];
    whyText.innerHTML = why_text;
  }

  window.addEventListener('load', loadWhy, false);

})();

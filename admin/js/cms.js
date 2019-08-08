(function() {
    var sectionsLinks = document.querySelectorAll('.sectCont');
    var menu = document.querySelector('#menuContainer');
    var options = document.querySelectorAll('.mythOptions');
    var mUpdate = document.querySelector('#updateMythMenu');
    var mAdd = document.querySelector('#addMythMenu');
    var mDelete = document.querySelector('#deleteMyth');
    var mythSections = [mUpdate, mAdd, mDelete];
    var mythMenu = document.querySelector('#initialOptions');
    var outerback = document.querySelector('#outerBack');
    var innerback = document.querySelector('#innerBack');
    var otherBacks = document.querySelectorAll('.otherBack');
  
    function mythOptions(){
      if(this.id == 'updateM'){
        mythMenu.classList += ' dissapear';
        innerback.classList.remove("dissapear");
        mUpdate.classList = ' ';
      }else if(this.id =='addM'){
        mythMenu.classList += ' dissapear';
        innerback.classList.remove("dissapear");
        mAdd.classList = ' ';
      }else if(this.id == 'deleteM'){
        mythMenu.classList += ' dissapear';
        innerback.classList.remove("dissapear");
        mDelete.classList = ' ';
      }
    }
  
  
    function backToOptions(){
      for(var i = 0;  i < mythSections.length; i ++){
        mythSections[i].classList = '';
        mythSections[i].classList += ' dissapear';
        mythMenu.classList = '';
        innerback.classList += ' dissapear';
        
      }
    }
  
  
    for (var i=0; i < options.length; i++){
      options[i].addEventListener('click', mythOptions, false);
    }
    
    innerback.addEventListener('click',backToOptions,false);
  
  })();
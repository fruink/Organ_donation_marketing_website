// JavaScript Document

(function() {
	var whyText = document.querySelector('#wText');
	var whyImage = document.querySelector('#phonehand');
	var step1 = document.querySelector('#step1');
	var step2 = document.querySelector('#step2');
	var step3 = document.querySelector('#step3');
    var steps = [step1,step2,step3];
    var title1 = document.querySelector('#title1');
    var title2 = document.querySelector('#title2');
    var title3 = document.querySelector('#title3');
    var titles =[title1, title2, title3];
	var slider = document.querySelector('#slider');
    var title = document.querySelector('#title');
    var facts = document.querySelector('#facts');
    var organs = document.querySelectorAll('.image');
    var storyImg = document.querySelector('#signholding');
    var storyName = document.querySelector('#storyName');
    var storyBio = document.querySelector('#storyBio');
    var myths = document.querySelectorAll('.myth');
    var factText = document.querySelectorAll('.fact');
    var larrow = document.querySelector('#larrow');
    var rarrow = document.querySelector('#rarrow');
    var counter = 0;
    var savedData;
    var video = document.querySelector('#videoSrc');
    var whyCont = document.querySelector('#whyContainer');
    var box1 = document.querySelector('#step1box');
    var box2 = document.querySelector('#step2box');
    var box3 = document.querySelector('#step3box');
    var myth1 = document.querySelector('.mythbox');
    var myth2 = document.querySelector('.mythbox2');
    var fact1 = document.querySelector('.factbox');
    var fact2 = document.querySelector('.factbox2');
    var opener = document.querySelector('#hamburger');
    var header = document.querySelector('#header');
    var closer = document.querySelector('#closer');

    function openNav(){
        header.style.display = 'block';
        opener.style.display = 'none';
        closer.style.display='block';

    }

    function closeNav(){
        header.style.display = 'none';
        closer.style.display = 'none';
        opener.style.display = 'block';
    }

    function scroller(){
        var scrollTop = window.pageYOffset;
        console.log(scrollTop);
        if(scrollTop >= 400){
            whyCont.classList.add('fadeIn');
        } 
        if(scrollTop >= 1200){
            box1.classList.add('fadeIn');
            box2.classList.add('fadeIn2b');
            box3.classList.add('fadeIn3');
        }
        if(scrollTop >= 2800){
            myth1.classList.add('fadeIn');
            fact1.classList.add('fadeIn2b');

        }
        if(scrollTop >= 3600){
            myth2.classList.add('fadeIn');
            fact2.classList.add('fadeIn2b');
        }
    }

	function loadWhy(){
    	const url = '../organ_donation/admin/phpscripts/connect.php?why=true';
    	fetch(url)
    	.then((resp) => resp.json())
    	.then((data) => { processResultWhy(data); })
    	.catch(function(error) {
        console.log(error);
    	});
	}

	function loadHow(){
		const url = '../organ_donation/admin/phpscripts/connect.php?how=true';
		fetch(url)
		.then((resp) => resp.json())
		.then((data) => { processResultHow(data); })
		.catch(function(error) {
			console.log(error);
		});
    }

    function saveData(data){
        savedData = data;
        console.log(savedData);
    }

    
    function loadStories(){
        const url = '../organ_donation/admin/phpscripts/connect.php?story=true';
        fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultStory(data); saveData(data); })
        .catch(function(error) {
            console.log(error);
        });
    }

    function loadStoriesNext(){
        counter = counter + 1;
        if (savedData[counter] == null){
            counter = counter - 1;
        }else{
            storyImg.classList.add('fadeOut');
            storyName.classList.add('fadeOut');
            storyBio.classList.add('fadeOut');
            setTimeout(function() {
                storyImg.style.opacity = 0;
                storyName.style.opacity = 0;
                storyBio.style.opacity = 0;
            }, 800);

            setTimeout(function() {
                storyImg.classList.remove('fadeOut')
                storyImg.classList.add('fadeIn2');
                storyName.classList.remove('fadeOut');
                storyName.classList.add('fadeIn2');
                storyBio.classList.remove('fadeOut');
                storyBio.classList.add('fadeIn2');
                storyImg.style.opacity = 1;
                storyName.style.opacity = 1;
                storyBio.style.opacity = 1;
                storyImg.classList.remove('fadeIn2');
                storyName.classList.remove('fadeIn2');
                storyBio.classList.remove('fadeIn2');
                const {story_bio, story_image, story_name} = savedData[counter];
                storyImg.src = 'images/'+story_image;
                storyName.innerHTML = story_name;
                storyBio.innerHTML = story_bio; 
            }, 1000);
            

        }
        
    }

    function loadStoriesPrevious(){
        if (counter > 0){
                counter = counter -1;
                storyImg.classList.add('fadeOut');
                storyName.classList.add('fadeOut');
                storyBio.classList.add('fadeOut');
                setTimeout(function() {
                    storyImg.style.opacity = 0;
                    storyName.style.opacity = 0;
                    storyBio.style.opacity = 0;
                }, 800);
    
                setTimeout(function() {
                    storyImg.classList.remove('fadeOut')
                    storyImg.classList.add('fadeIn2');
                    storyName.classList.remove('fadeOut');
                    storyName.classList.add('fadeIn2');
                    storyBio.classList.remove('fadeOut');
                    storyBio.classList.add('fadeIn2');
                    storyImg.style.opacity = 1;
                    storyName.style.opacity = 1;
                    storyBio.style.opacity = 1;
                    storyImg.classList.remove('fadeIn2');
                    storyName.classList.remove('fadeIn2');
                    storyBio.classList.remove('fadeIn2');
                    const {story_bio, story_image, story_name} = savedData[counter];
                    storyImg.src = 'images/'+story_image;
                    storyName.innerHTML = story_name;
                    storyBio.innerHTML = story_bio; 
                }, 1000);
        } 
    }

    function loadMyths(){
        const url = '../organ_donation/admin/phpscripts/connect.php?myths=true';
        fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultMyths(data); })
        .catch(function(error) {
            console.log(error);
        });

    }

    function loadOrgans(){
        const url = '../organ_donation/admin/phpscripts/connect.php?organs=true';
        fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processResultOrgan(data); })
        .catch(function(error) {
            console.log(error);
        });
    }

    function loadSpecificOrgan(id){
        const url = '../organ_donation/admin/phpscripts/connect.php?organid='+id;
        fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processSpecificOrgan(data); })
        .catch(function(error) {
            console.log(error);
        })
        
    }

    function loadVideo(){
        const url ='../organ_donation/admin/phpscripts/connect.php?video=true';
        fetch(url)
        .then((resp) => resp.json())
        .then((data) => { processVideo(data); })
        .catch(function(error) {
            console.log(error);
        })
    }

	function processResultWhy(data){
    	const {why_text, why_img} = data[0];
    	whyText.innerHTML = why_text;
		whyImage.src = 'images/'+why_img; 
	}

	function processResultHow(data){
		for(var i = 0; i < steps.length; i++){
			const {how_title, how_text} = data[i];
            steps[i].innerHTML = how_text;
            titles[i].innerHTML = how_title;
		}
    }
    
    function processResultStory(data){
        const {story_bio, story_image, story_name} = data[0];
        storyImg.src = 'images/'+story_image;
        storyName.innerHTML = story_name;
        storyBio.innerHTML = story_bio;
    }

    function processResultMyths(data){
        for(var i = 0; i < myths.length; i++){
            const {myths_false, myths_true} = data[i];
            myths[i].innerHTML = myths_false;
            factText[i].innerHTML = myths_true;
        }
    }

    function processResultOrgan(data){
        for(var i = 0; i < organs.length; i++){
            const {organ_img} = data[i];
            organs[i].src = 'images/'+organ_img;
        }
    }

	function openUp(){
        slider.classList.add('slideout');
        loadSpecificOrgan(this.id);
        title.classList.add('fadeIn');
        facts.classList.add('fadeIn');
    }

    function processSpecificOrgan(data){
        const {organ_name, organ_text} = data[0];
        title.innerHTML = organ_name;
        facts.innerHTML = organ_text;
    }

    function processVideo(data){
        const { video_src } = data[0];
        video.src = 'video/'+video_src;
        console.log('fire');
    }

    for(var i = 0; i < organs.length; i++){
        organs[i].addEventListener('click',openUp, false);
    }
	window.addEventListener('load', loadWhy, false);
    window.addEventListener('load', loadHow, false);
    window.addEventListener('load', loadStories, false);
    window.addEventListener('load', loadMyths, false);
    window.addEventListener('load', loadOrgans, false);
    window.addEventListener('load', loadVideo, false);
    rarrow.addEventListener('click', loadStoriesNext, false);
    larrow.addEventListener('click', loadStoriesPrevious, false);
    window.addEventListener('scroll', scroller,false);
    opener.addEventListener('click', openNav,false);
    closer.addEventListener('click', closeNav, false);

})();
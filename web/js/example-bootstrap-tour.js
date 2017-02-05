$(function(){
	var $start=$('.start'), 
	tour=new Tour({
		onStart:function(){
			$start.addClass('disabled',true);
		},
		onEnd:function(){
			$start.removeClass('disabled',true);
		}});
	tour.addStep({
		element:'#download',
		placement:"bottom",
		title:"Welcome to Bootstrap Tour!",
		content:"Introduce new users to your product by walking them "+"through it step by step. Built on the awesome "+"<a href='http://twitter.github.com/bootstrap' target='_blank'>"+"Bootstrap from Twitter.<\/a>"});
	tour.addStep({
		element:"#usage",
		placement:"top",title:"Setup in four easy steps",
		content:"Easy is better, right? Easy like Bootstrap.",
		options:{
			labels:{
				prev:"Go back",
				next:"Hey",
				end:"Stop"
			}
		}
	});
	tour.addStep({
		path:"/",
		element:"#options",
		placement:"top",
		title:"And it is powerful!",
		content:"There are more options for those, like us, who want to do "+"complicated things. <br \/>Power to the people! :P",
		reflex:true
	});
	tour.addStep({
		path:"/",
		element:"#reflex",
		placement:"bottom",
		title:"Reflex mode",
		content:"Reflex mode is enabled, click on the page heading to continue!",
		reflex:true});
	tour.addStep({
		path:"/page.html",
		element:"h1",
		placement:"bottom",
		title:"See, you are not restricted to only one page",
		content:"Well, nothing to see here. Click next to go back "+"to the index page."
	});
	tour.addStep({
		path:"/",
		element:"#contributing",
		placement:"bottom",
		title:"Best of all, it's free!",
		content:"Yeah! Free as in beer... or speech. Use and abuse, "+"but don't forget to contribute!"});
	tour.start();
	if(tour.ended()){$('<div class="alert">'+'<button class="close" data-dismiss="alert">&times;</button>'+'You ended the demo tour. <a href="#" class="start">Restart the demo tour.</a>'+'</div>').prependTo('.content').alert();}
$(document).on('click','.start:not(.disabled)',function(e){e.preventDefault();tour.restart();$('.alert').alert('close');});});
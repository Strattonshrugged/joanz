$(document).ready(function(){
console.log('Joanzalt Javascript Loaded');

// This is the charm object; think of null as undecided or "I don't know yet"
function charm ()    {
    this.tag = null;
    this.tagFont = null;
    this.tagText = null;
    this.tagBorder = null;
    this.heart = null;
    this.chain = null;
};

var wip = new charm();
var cart = [];

function state ()   {
    if (wip.tag == null) {
        $(".menu").hide();
        $(".landing").show();
    }   else if (wip.tag == true && wip.tagFont == null) {
        $(".menu").hide();
        $(".tagFont").show();
    }   else if (wip.tag == true && wip.tagText == null) {
        $(".menu").hide();
        $(".tagText").show();
    }   else if (wip.tag == true && wip.tagBorder == null)    {
        $(".menu").hide();
        $(".tagBorder").show();
    }   else if (wip.heart == true)     {
        $(".menu").hide();
        $(".chain").show();
    }   else if (wip.chain == true)   {
        $(".menu").hide();
        $(".chain").show();
    }
    console.dir(wip);
};

// switchboard
$('#fullCharm').click(function(){
    wip.tag = true;
    wip.heart = true;
    wip.chain = true;
    state();
})
$('#tagOnly').click(function(){
    wip.tag = true;
    wip.heart = false;
    wip.chain = false;
    state();
})
$('#heartOnly').click(function(){
    wip.tag = false;
    wip.heart = true;
    wip.chain = false;
    state();
})
$('#chainOnly').click(function(){
    wip.tag = false;
    wip.heart = false;
    wip.chain = true;
    state();
})
$('#smlText').click(function(){
    wip.tagFont = 'small';
    state();
})
$('#mdmText').click(function(){
    wip.tagFont = 'medium';
    state();
})
$('#lrgText').click(function(){
    wip.tagFont = 'large';
    state();
})
$('#fullCharm').click(function(){

})
$('#dots').click(function(){

})
$('#noDots').click(function(){

})
$('#heart').click(function(){

})
$('#noHeart').click(function(){

})
$('#chain7').click(function(){

})
$('#chain20').click(function(){

})
$('#noChain').click(function(){

})

$('.menu').slick({
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    infinite: true,
});

state(); // first call of State




}); // document ready function

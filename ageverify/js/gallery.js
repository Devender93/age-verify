// JavaScript Document

function beerGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('beer');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}

var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var beerBtn = document.getElementById('btnBeer');
beerBtn.style.backgroundColor = "#82c240";
}


function wineGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('wine');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}

var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var wineBtn = document.getElementById('btnWine');
wineBtn.style.backgroundColor = "#82c240";
}


function popularGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('popular');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}

var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var popularBtn = document.getElementById('btnPopular');
popularBtn.style.backgroundColor = "#82c240";
}


function spiritsGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('spirits');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}
var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var spiritsBtn = document.getElementById('btnSpirits');
spiritsBtn.style.backgroundColor = "#82c240";
}


function tobaccoGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('tobacco');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}
var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var tobaccoBtn = document.getElementById('btnTobacco');
tobaccoBtn.style.backgroundColor = "#82c240";
}


function gamingGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('gaming');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}
var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var gamingBtn = document.getElementById('btnGaming');
gamingBtn.style.backgroundColor = "#82c240";
}


function marijuanaGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('marijuana');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}
var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var marijuanaBtn = document.getElementById('btnMarijuana');
marijuanaBtn.style.backgroundColor = "#82c240";
}

function adultGallery(){
var elemsHide = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsHide.length;i+=1){
  elemsHide[i].style.display = 'none';
}
var elemsShow = document.getElementsByClassName('adult');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}
var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var adultBtn = document.getElementById('btnAdult');
adultBtn.style.backgroundColor = "#82c240";
}

function allGallery(){
var elemsShow = document.getElementsByClassName('galleryItem');
for (var i=0;i<elemsShow.length;i+=1){
  elemsShow[i].style.display = 'inline-block';
}
var btnReset = document.querySelectorAll("#btnBeer, #btnWine, #btnAdult, #btnMarijuana, #btnTobacco, #btnSpirits, #btnPopular, #btnGaming, #btnAll");
for (var i=0;i<btnReset.length;i+=1){
  btnReset[i].style.backgroundColor = '#00a0d2';
}

var allBtn = document.getElementById('btnAll');
allBtn.style.backgroundColor = "#82c240";
}

jQuery(document).ready(function ($) {
  $('.ageverify-language').click(function(){
      if($(this).attr("value")==="en"){
          $(".form-table tr:last-child").show();
      }
	  if($(this).attr("value")==="cz"){
          $(".form-table tr:last-child").hide();
      }
      if($(this).attr("value")==="de"){
          $(".form-table tr:last-child").hide();
      }
      if($(this).attr("value")==="fr"){
          $(".form-table tr:last-child").hide();
      }
      if($(this).attr("value")==="jp"){
          $(".form-table tr:last-child").hide();
      }
      if($(this).attr("value")==="nl"){
          $(".form-table tr:last-child").hide();
      }
	        if($(this).attr("value")==="pt"){
          $(".form-table tr:last-child").hide();
      }
	        if($(this).attr("value")==="ru"){
          $(".form-table tr:last-child").hide();
      }
	        if($(this).attr("value")==="se"){
          $(".form-table tr:last-child").hide();
      }
	        if($(this).attr("value")==="sp"){
          $(".form-table tr:last-child").hide();
      }
  });
});
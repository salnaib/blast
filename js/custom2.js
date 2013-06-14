/*-----------------------------------------------------------------------------------
/*
/* Custom 2 JS:  Contains extra JS functions
/*   By MN July 2012
/*
-----------------------------------------------------------------------------------*/

/*----------------------------------------------------*/
/*	Global Variables
/*----------------------------------------------------*/

var myBodyWidth = 1000; // some default number
var myMobileWidth = 768;
var isMobileWidth = true; // assume mobile by default

/*----------------------------------------------------*/
/*	Global Functions
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/*----------------------------------------------------*/

/*----------------------------------------------------*/
/*	GetURLParameter
/*----------------------------------------------------*/


function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}    

/*----------------------------------------------------*/
/*	check is set
/*----------------------------------------------------*/
function myIsset(a) {
    try {
      if ((typeof (a) === 'undefined')  )
          return false;
      else if (a === null)
          return false
      else
          return true;
    } catch(err) { /* do nothing */ }
    
    return false ; // there must have been an error 
};
  
/*----------------------------------------------------*/
/*	Safe Set    safely return the value of a, unless a is undefined, in which case return b (or if that is not defined, then return "")
/*----------------------------------------------------*/
function mySafe(a, b) {
  backup = "";

  try {
    if (myIsset(b))
      backup = b;
  } catch(err) { /* do nothing */ }
 
  try {
    if (myIsset(a))
      return a;
    else 
      return backup;
  } catch(err) { /* do nothing */ }
      return backup; // there must have been an error 
};
  


/*----------------------------------------------------*/
/*	JQUERY BLOCKS
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/*----------------------------------------------------*/


jQuery(document).ready(function($) {



/*----------------------------------------------------*/
/*	Compute if Mobile Size
/*  check with if ( !(window['isMobileWidth']) )  
/*----------------------------------------------------*/

  myBodyWidth = jQuery('body').width();
  isMobileWidth = (myBodyWidth < myMobileWidth) ? true : false;

  $(window).resize(function () {
      if (jQuery('body').width() != myBodyWidth) {
          //If the media query has been triggered
          myBodyWidth = jQuery('body').width();
          isMobileWidth = (myBodyWidth < myMobileWidth) ? true : false;
      }
  });
  



/* End Document */
});


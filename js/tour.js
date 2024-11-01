/* globals borohop: false */




var tour = {



  id: 'hello-borohop', 



  steps: [



    {

/* Top */

      target: 'h1',
      title: 'Your account name.',
      content: 'In a few easy steps create your profile page.',
      placement: 'bottom',
      arrowOffset: 60,      


    },



    {

/* Cover */

      target: 'i.um-icon-plus',
      placement: 'top',
      title: 'Upload your cover',
      content: 'Click to open up the uploader and to upload a profile cover. You will be able to see your computer and select an image file.',
      xOffset: -20

    },






    { 

/* Avatar */

      target: 'a.um-profile-photo-img',
      placement: 'right',
      title: 'Upload your avatar',
      content: 'Click to open up the uploader and to upload your photo. You will be able to see your computer and select an image file.',
      xOffset: -25



    },


    {

/* Brief Description */

      target: 'div.um-meta-text',
      placement: 'bottom',
      title: 'Brief description ',
      content: 'Tell us something about yourself.',



    },



    {

/* Name */

      target: 'div.um-field.um-field-first_name',
      placement: 'top',
      title: 'Your first name',
      content: 'First name goes here',
      yOffset: 25

    },



    {


/* Last Name */

      target: 'div.um-field.um-field-last_name',
      placement: 'top',
      title: 'Your last name',
      content: 'Full last name here',
      yOffset: 25

    },



    {

/* Country */

      target: 'div.um-field.um-field-country',
      placement: 'top',
      title: 'Your country',
      content: 'Click on the dropdown menu to select your country of origen.',
      yOffset: 25

    },

    {

/* Biography */

      target: 'div.um-field.um-field-description',
      placement: 'top',
      title: 'Your bio',
      content: 'Type your biography giving as many details as you like.',
      yOffset: 25

    },



    {


/* Edit profile (cog) */
      
      target: 'i.um-faicon-cog',
      placement: 'left',
      title: 'Edit your profile',
      content: 'Click on this gear icon to edit your profile page.', 
      nextOnTargetClick: true,
      yOffset: -10,
      showNextButton: false,
      showCloseButton: true

    },

    {

/* Update button */

      target: 'div.um-left.um-half',
      placement: 'top',
      title: 'Update',
      content: 'Click to update your profile and close.',
      

    },






  ],

  skipIfNoElement: true,
  showCloseButton: true,
  showPrevButton: true,
  scrollTopMargin: 100



},







/* ========== */

/* TOUR STARTUP */

/* ========== */



addClickListener = function(el, fn) {



  if (el.addEventListener) {



    el.addEventListener('click', fn, false);



  }



  else {



    el.attachEvent('onclick', fn);



  }



},







init = function() {



  var startBtnId = 'beginBoroHop',



      calloutId = 'startTourCallout',



      mgr = borohop.getCalloutManager(),



      state = borohop.getState();







  if (state && state.indexOf('hello-borohop:') === 0) {



    // Already started the tour at some point!



    borohop.startTour(tour);



  }



  







  addClickListener(document.getElementById(startBtnId), function() {



    if (!borohop.isActive) {



      mgr.removeAllCallouts();



      borohop.startTour(tour);



    }



  });



};







init();



 




jQuery(document).ready(function(){
    jQuery('.gallery a:has(img)').attr('data-lightbox-gallery', 'nivo-gallery');
    jQuery('a:has(img)').nivoLightbox({
        effect: 'fade', // The effect to use when showing the lightbox
        theme: 'default', // The lightbox theme to use
        keyboardNav: true, // Enable/Disable keyboard navigation (left/right/escape)
        onInit: function(){}, // Callback when lightbox has loaded
        beforeShowLightbox: function(){}, // Callback before the lightbox is shown
        afterShowLightbox: function(lightbox){}, // Callback after the lightbox is shown
        beforeHideLightbox: function(){}, // Callback before the lightbox is hidden
        afterHideLightbox: function(){}, // Callback after the lightbox is hidden
        onPrev: function(element){}, // Callback when the lightbox gallery goes to previous item
        onNext: function(element){}, // Callback when the lightbox gallery goes to next item
        errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
    });
});
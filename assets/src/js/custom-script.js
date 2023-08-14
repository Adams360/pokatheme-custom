jQuery(document).ready(function($) {
    $('.review-box__toggle').click(function() {
        // Reference to the specific card that was clicked
        var $card = $(this).closest('.review-box');

        // Toggle the "active" class on the .expand div of the clicked card
        $card.find('.review-box__expand').toggle();

        // Check if the content is currently expanded or collapsed
        var isExpanded = $(this).attr('aria-expanded') === 'true';

        // Toggle the aria-expanded attribute for the button
        $(this).attr('aria-expanded', !isExpanded);

        // Toggle the aria-hidden attribute for the content of the clicked card
        $card.find('#expand-content').attr('aria-hidden', isExpanded);
        
        // Change the button text accordingly
        $(this).find('span').text(isExpanded ? 'Show' : 'Hide');
    });
});

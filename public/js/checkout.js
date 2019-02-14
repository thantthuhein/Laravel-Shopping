// // pk_test_gAxNnwWdFZ6cSxqMSdcHZlml
// // sk_test_0CqwJ2wOlnObBSTDTLkEoKR3

// Stripe.setPublishableKey('pk_test_7xvSbFmjQLrot401JtDfouvv');

// var $form = $('#checkout-form');
 
// $from.submit(function(event) {
//     $('#charge-error').addClass('hidden');
//     $form.find('button').prop('disabled', true);

//     Stripe.card.createToken({
//         name: $('#card-name').val(),
//         number: $('#card-number').val(),
//         cvc: $('#card-cvc').val(),
//         exp_month: $('#card-expiry-month').val(),
//         exp_year: $('#card-expiry-year').val(),
//     }, stripeResponseHandler());
// });

// function stripeResponseHandler(status, response) {
//     if (response.error) {
//         $('#charge-error').removeClass('hidden');
//         $('#charge-error').text(response.error.message);
//         $form.find('button').prop('disabled', false);
//     } else {
//         var token = response.id;
//         $form.append($('<input type="hidden" name="stripeToken"/>').val(token));
//         $form.get(0).submit();
//     }
// }




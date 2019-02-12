var stripe = Stripe('pk_test_gAxNnwWdFZ6cSxqMSdcHZlml');

stripe.createToken(card).then(function(result) {
    // Handle result.error or result.token
  });
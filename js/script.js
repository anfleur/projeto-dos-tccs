if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('js/sw.js').then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registrado com sucesso :) : ', registration.scope);
      }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registro deu falha :( : ', err);
      });
    });
  }
(function ($) {
const $quotes = $('.entry-content')
const $author = $('.entry-title')
    $(document).ready(function () {

      let lastPage = '';
      // const $quotes =$('.entry-content p')
      //get a random post and append content to dom
      $('#new-quote-button').on('click', function(event){
         event.preventDefault();
         getQuote();
      });

      function getQuote(){

         lastPage = document.url;


         $.ajax({
            method: 'GET',
            url: qod_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
         }).done(function(data){
            $quotes.empty();
            $('.entry-content').append(data[0].content.rendered);
            $author.empty();
            $('.entry-title').append(' — ' + data[0].slug);
            //TODOne append content to dom to replace quote content with rest api content
            const quote = data[0];
            // figure out post slug-done!
            history.pushState(null,null,qod_vars.home_url + '/' + quote.slug)
         }).fail(function(err){
            // TODO append message for user on fail saying something went wrong
            console.log(err);
         });
      }// end of getQuote

      $(window).on('popstate', function(){
         window.location.replace(lastPage);
      });

      // submit form and create new quote post
      $('#quote-submission-form').on('submit', function(event) {
         event.preventDefault();
         postQuote();

      });

      function postQuote(){

         //get values of the form input
         const quoteTitle = $('#quote-author').val();
         const quoteContent = $('#quote-content').val();
         const quoteSource = $('#quote-source').val();
         const quoteUrl = $('#quote-source-url').val();
         $.ajax({
            method: 'POST',
            url: qod_vars.rest_url + 'wp/v2/posts',
            data: {
               title: quoteTitle,
               content: quoteContent,
               _qod_quote_source: quoteSource,
               _qod_quote_source_url: quoteUrl,
               status: 'publish',
            },
               beforeSend: function(xhr) {
                  xhr.setRequestHeader( 'X-WP-Nonce', qod_vars.nonce );
            }
         }).done(function(){
            console.log('response-worked');
            //.slideUp the form
            $('#quote-submission-form').slideUp();
            //append a success message
            function successAlert() {
               succesAlert("something worked");
           }
         }).fail(function(){
            console.log('something failed')
            function failAlert() {
               alert("something went wrong");
           }
            //output message for user stating something went wrong
         });
      }
      

    });// end of doc ready
})(jQuery);
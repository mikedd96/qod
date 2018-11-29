(function ($) {

    $(document).ready(function () {
const $quotes = $('.entry-content')
const $author = $('.entry-title')
      let lastPage = '';
      $('#new-quote-button').on('click', function(event){
         event.preventDefault();
         getQuote();
      });

      function getQuote(){

         lastPage = document.URL;


         $.ajax({
            method: 'GET',
            url: qod_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
         }).done(function(data){
            $quotes.empty();
            $('.entry-content').append(data[0].content.rendered);
            $author.empty();
            $('.entry-title').append(' — ' + data[0].slug);
            const quote = data[0];
            history.pushState(null,null,qod_vars.home_url + '/' + quote.slug)
         }).fail(function(err){            console.log(err);
         });
      }// end of getQuote

      $(window).on('popstate', function(){
         window.location.replace(lastPage);
      });

      $('#quote-submission-form').on('submit', function(event) {
         event.preventDefault();
         postQuote();

      });

      function postQuote(){
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
               status: 'pending',
            },
               beforeSend: function(xhr) {
                  xhr.setRequestHeader( 'X-WP-Nonce', qod_vars.nonce );
            }
         }).done(function(){
            successAlert();
            $('#quote-submission-form').slideUp();
            function successAlert() {
               alert("quote submitted");
           }
         }).fail(function(){
            failAlert();
            function failAlert() {
               alert("something went wrong");
           }
         });
      }
      

    });// end of doc ready
})(jQuery);
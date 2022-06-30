// $(document).ready(function() 
// {
//     $('.cards-container .question').hide();
//     $('.btn-continue').click(function() {
//         $(this).prop('disabled', true);
//         $nextdiv = $(this).parent().parent().parent().next();
//         $nextdiv.find('.qa-desc').hide();
//         $nextdiv.find('.btn-continue').hide();
//         $nextdiv.find('.btn-end').hide();
//         $nextdiv.show();
//         $('html, body').animate({
//             scrollTop: $nextdiv.offset().top
//         }, 'fast');

//         $nextdiv.find('.btn-check').click(function() {
//             $(this).parent().parent().find('.btn-check').prop('disabled', true);
//             $(this).parent().find('.qa-desc').show();
//             $(this).parent().parent().find('.btn-continue').show();
//             $(this).parent().parent().find('.btn-end').show();
//         });
//     });
// });
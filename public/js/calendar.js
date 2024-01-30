$(function () {
  $('.delete-parts-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    // クリックされた要素の属性からデータを取得
    var date = $(this).find('button').data('date');
    var part = $(this).find('button').text();
    // モーダル内の要素に取得したデータをセット
    $('.modal-inner-date').text(date);
    $('.modal-inner-part').text(part);
    // フォームにデータを設定
    $('.modal-date [name="date"]').val(date);
    $('.modal-part [name="part"]').val(part);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});

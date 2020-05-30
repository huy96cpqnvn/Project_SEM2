$(document).ready(function() {
    let $inputSearch = $("input#btn-search");
    let $inputSearchValue= $("input#searchValue");
    $inputSearch.click(function () {

var pathname = window.location.pathname;
        let searchparams = new URLSearchParams(window.location.search); // filter_status=active
        console.log(searchparams);
        let searchFiled   = $inputSearchField.val();
        let searchValue   = $inputSearchValue.val();
        if (searchValue == ''){
            alert('Nhập giá trị cần tìm');
        }else window.location.href= pathname +'?'+ link + 'search_filed=' +searchFiled+'&search_value='+searchValue;

    });
});

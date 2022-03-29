function tableToCSV(filename = null) {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var current_date = day+'_'+(month<10 ? '0' : '') + month + '_' +(day<10 ? '0' : '')+d.getFullYear();

    var clean_text = function(text){
        text = text.replace(/"/g, '""');
        return '"'+text+'"';
    };
    
    $(this).each(function(){
            var table = $(this);
            var caption = $(this).find('caption').text();
            var title = [];
            var rows = [];

            $(this).find('tr').each(function(){
                var data = [];
                $(this).find('th').each(function(){
                    var text = clean_text($(this).text());
                    title.push(text);
                    });
                $(this).find('td').each(function(){
                    var text = clean_text($(this).text());
                    data.push(text);
                    });
                data = data.join(",");
                rows.push(data);
                });
            title = title.join(",");
            rows = rows.join("\n");

            var csv = title + rows;
            var uri = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
            var download_link = document.createElement('a');
            download_link.href = uri;
            var ts = new Date().getTime();
            if(filename == null){
				download_link.download = ts+".csv";
			} else {
				download_link.download = filename+".csv";
			}
            document.body.appendChild(download_link);
            download_link.click();
            document.body.removeChild(download_link);
    });
}
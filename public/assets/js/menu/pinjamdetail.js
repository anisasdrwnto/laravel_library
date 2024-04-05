console.log("ini pinjam detail page");

var pd = {
    getPeminjamDetails:function(){
        $('#tbpinjamdetail').html('');
        var json = {
           buku_id : ''
        };


        var url = '/pmdetails/getHistoryPeminjam';
        ajax.ajaxGet(url, json, function(response){
            //console.log(response);
            var PeminjamDetails = "";

            for(let i = 0; i < response.length; i++){
                var id_peminjaman = response[i].peminjaman_id;
                var id_buku = response[i].buku_id;
                var id = i + 1;

                P+="<tr><td>"+ id +  "</td>";
                PeminjamDetails+="<td>" + id_peminjaman + "</td>";
                PeminjamDetails+="<td>" + id_buku + "</td>";
                
               
                
                // console.log(PeminjamDetails);

            }
            $('#tbpinjamdetail').html(PeminjamDetails);
        });
    }
}
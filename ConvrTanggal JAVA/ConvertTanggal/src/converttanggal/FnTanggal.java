package converttanggal;

public class FnTanggal {
    public static String Convert(int Tipe, String Target) {
        String ListBulan = "Januari@@Februari@@Maret@@April@@Mei@@Juni@@Juli@@Agustus@@September@@Oktober@@November@@Desember";
        String[] Bulan = ListBulan.split("@@");
        String Result = null;
        
        if(Tipe==0) {
            Result = null;
        }
        else if(Tipe==10) {
            String[] Tanggal = Target.split("-");
            Result = Tanggal[2] + "-" + Tanggal[1] + "-" + Tanggal[0];
        }
        else if(Tipe==20) {
            String[] Tanggal = Target.split("-");
            int Month = Integer.parseInt(Tanggal[1]);
            Result = Tanggal[2] + " " + Bulan[Month-1] + " " + Tanggal[0];
        }
        return Result;
    }
}

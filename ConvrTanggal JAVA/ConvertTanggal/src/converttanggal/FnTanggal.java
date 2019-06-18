package converttanggal;

public class FnTanggal {
    public static String Convert(int Tipe, String Target) {
        String ListBulan = "Januari@@Februari@@Maret@@April@@Mei@@Juni@@Juli@@Agustus@@September@@Oktober@@November@@Desember";
        String BulanEng = "January@@February@@March@@April@@May@@June@@July@@August@@September@@October@@November@@December";
        String NmbMonth = "01@@02@@03@@04@@05@@06@@07@@08@@09@@10@@11@@12";
        String[] NoBulan = NmbMonth.split("@@");
        String[] Bulan;
        String Result;
        switch (Tipe) {
            case 0:
                Result = null;break;
            case 10:
                // Convert : 28-02-2019 --> 2019-02-28
                // Convert : 2019-02-28 --> 28-02-2019
                {String[] Tanggal = Target.split("-");Result = Tanggal[2] + "-" + Tanggal[1] + "-" + Tanggal[0];break;}
            case 11:
                // Convert : 28-02-2019 --> 02-28-2019
                // Convert : 02-28-2019 --> 28-02-2019
                {String[] Tanggal = Target.split("-");Result = Tanggal[1] + "-" + Tanggal[0] + "-" + Tanggal[2];break;}
            case 12:
                // Convert : 28/02/2019 --> 2019/02/28
                // Convert : 2019/02/28 --> 28/02/2019
                {String[] Tanggal = Target.split("/");Result = Tanggal[2] + "/" + Tanggal[1] + "/" + Tanggal[0];break;}
            case 13:
                // Convert : 28/02/2019 --> 02/28/2019
                // Convert : 02/28/2019 --> 28/02/2019
                {String[] Tanggal = Target.split("/");Result = Tanggal[1] + "/" + Tanggal[0] + "/" + Tanggal[2];break;}
            case 20:
                // Convert : 28/02/2019 --> 28-02-2019
                {String[] Tanggal = Target.split("/");Result = Tanggal[0] + "-" + Tanggal[1] + "-" + Tanggal[2];break;}
            case 21:
                // Convert : 28-02-2019 --> 28/02/2019
                {String[] Tanggal = Target.split("-");Result = Tanggal[0] + "/" + Tanggal[1] + "/" + Tanggal[2];break;}
            case 22:
                // Convert : 28.02.2019 --> 28-02-2019
                {String[] Tanggal = Target.split(".");Result = Tanggal[0] + "-" + Tanggal[1] + "-" + Tanggal[2];break;}
            case 23:
                // Convert : 28-02-2019 --> 28.02.2019
                {String[] Tanggal = Target.split("-");Result = Tanggal[0] + "." + Tanggal[1] + "." + Tanggal[2];break;}
            case 30:
                // Convert : 2019-02-28 --> 28 Februari 2019
                {Bulan = ListBulan.split("@@");String[] Tanggal = Target.split("-");int Month = Integer.parseInt(Tanggal[1]);
                Result = Tanggal[2] + " " + Bulan[Month-1] + " " + Tanggal[0];break;}
            case 31:
                // Convert : 28-02-2019 --> 28 Februari 2019
                {Bulan = ListBulan.split("@@");String[] Tanggal = Target.split("-");int Month = Integer.parseInt(Tanggal[1]);
                Result = Tanggal[0] + " " + Bulan[Month-1] + " " + Tanggal[2];break;}
            case 32:
                // Convert : 02-28-2019 --> 28 Februari 2019
                {Bulan = ListBulan.split("@@");String[] Tanggal = Target.split("-");int Month = Integer.parseInt(Tanggal[0]);
                Result = Tanggal[1] + " " + Bulan[Month-1] + " " + Tanggal[2];break;}
            case 33:
                // Convert : 2019-02-28 --> 28 February 2019 (English)
                {Bulan = BulanEng.split("@@");String[] Tanggal = Target.split("-");int Month = Integer.parseInt(Tanggal[1]);
                Result = Tanggal[2] + " " + Bulan[Month-1] + " " + Tanggal[0];break;}
            case 34:
                // Convert : 2019-02-28 --> 2019 February 28 (English)
                {Bulan = BulanEng.split("@@");String[] Tanggal = Target.split("-");int Month = Integer.parseInt(Tanggal[1]);
                Result = Tanggal[0] + " " + Bulan[Month-1] + " " + Tanggal[2];break;}
            case 35:
                // Convert : 2019-02-28 --> February 28, 2019 (English)
                {Bulan = BulanEng.split("@@");String[] Tanggal = Target.split("-");int Month = Integer.parseInt(Tanggal[1]);
                Result = Bulan[Month-1] + " " + Tanggal[2] + ", " + Tanggal[0];break;}
            case 40:
                // Convert : 28 Februari 2019 --> 28-02-2019
                {Bulan = ListBulan.split("@@");String[] Tanggal = Target.split("\\s+");String Month = null;
                for(int b = 0; b <= Bulan.length; b++){if(Tanggal[1].equals(Bulan[b])){Month = NoBulan[b];break;}}
                Result = Tanggal[0] + "-" + Month + "-" + Tanggal[2];break;}
            case 41:
                // Convert : 28 Februari 2019 --> 2019-02-28
                {Bulan = ListBulan.split("@@");String[] Tanggal = Target.split("\\s+");String Month = null;
                for(int b = 0; b <= Bulan.length; b++){if(Tanggal[1].equals(Bulan[b])){Month = NoBulan[b];break;}}
                Result = Tanggal[2] + "-" + Month + "-" + Tanggal[0];break;}
            case 42:
                // Convert : 28 Februari 2019 --> 28-02-2019
                {Bulan = ListBulan.split("@@");String[] Tanggal = Target.split("\\s+");String Month = null;
                for(int b = 0; b <= Bulan.length; b++){if(Tanggal[1].equals(Bulan[b])){Month = NoBulan[b];break;}}
                Result = Month + "-" + Tanggal[0] + "-" + Tanggal[2];break;}
            default:
                Result = null;
                break;
        }
        return Result;
    }
}

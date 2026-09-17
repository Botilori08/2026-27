internal class Program
{
    private static void Main(string[] args)
    {
        int[] meresek = new int[20];

        meresek = [650, 628, 628, 658, 683, 683, 644, 611, 645, 619, 619, 580, 580, 626, 626, 626, 598, 636, 612, 584];

        int hanyadik = 0;
        int legmagasabb;
        int legalacsonyabb;
        //1. feladat
        for(int i = 0; i < meresek.Length; i++)
        {
            if (meresek[i] > meresek[hanyadik])
            {
                hanyadik = i;
            }
        }
        legmagasabb = meresek[hanyadik];
        Console.WriteLine($"A {hanyadik + 1}. mérésnél járt a legmagasabban.");

        //2. feladat
        hanyadik = 0;
        for (int i = 0; i < meresek.Length; i++)
        {
            if (meresek[i] < meresek[hanyadik])
            {
                hanyadik = i;
            }
        }
        legalacsonyabb = meresek[hanyadik];
        Console.WriteLine($"A {hanyadik + 1}. mérésnél járt a legalacsonyabban.");

        //3.feladat
        for(int i = 0;i < meresek.Length;i++)
        {
            if (meresek[i] > meresek[hanyadik] && meresek[i] < legmagasabb)
            {
                hanyadik = i;
            }
        }
        Console.WriteLine($"A második legmagasabb pont helye: {hanyadik+1}");

        int osszeg = 0;
        for (int i = 0; i < meresek.Length; i++)
        {
            osszeg += meresek[i];
        }

        double atlag = osszeg / (double)meresek.Length;
        Console.WriteLine($"A mérések átlaga: {atlag} m");

        bool jart = false;
        for (int i = 0; i < meresek.Length; i++)
        {
            if (meresek[i] > 1000)
            {
                jart = true;
            }
        }
        if(jart)
        {
            Console.WriteLine("Járt 1000 méter fölötti magasságban.");
        }
        else
        {

            Console.WriteLine("Nem járt 1000 méter fölötti magasságban.");
        }

        int db = 0;
        for (int i = 0; i < meresek.Length; i++)
        {
            if(meresek[i] > 600 && meresek[i] < 650)
            {
                db++;
            }
        }

        Console.WriteLine($"{db} alkalommal mért 600 és 650 méter közti magasságot.");

        osszeg = 0;
        db =0;
        for(int i = 0; i < meresek.Length;i++)
        {
            if(meresek[i] > legalacsonyabb && meresek[i] < legmagasabb)
            {
                osszeg += meresek[i];
                db++;
            }
        }
        atlag = (double)osszeg / db;
        Console.WriteLine($"A mérések átlaga a legalacsonyabb és a legmagasabb adatok között: {atlag} m");




    }
}
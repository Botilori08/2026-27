namespace RealEstate
{
    internal class Program
    {
        static void Main(string[] args)
        {
            List <Ad> adatok = Ad.LoadFromCsv("realestates.csv");

            Console.WriteLine($"Sikeresen beolvasva {adatok.Count}");

            int osszeg = 0;
            double atlag = 0.0;

            var foldszintiLakasok = adatok.Where(ad => ad.Floors == 0).ToList();

            atlag = foldszintiLakasok.Average(ad => ad.Area);

            Console.WriteLine("6. feladat");
            Console.WriteLine($"1. A földszinti ingatlanok átlagos alapterülete: {Math.Round(atlag,2)} m2");

            double oviA = 47.4164220114023;
            double oviB = 19.066342425796986;


            var megfeleloAdat = adatok.Where(ad => ad.FreeOfCharge).OrderBy(ad => ad.DistanceTo(oviA,oviB)).First();

            Console.WriteLine(megfeleloAdat);


            Console.WriteLine("8.feladat");

            if (megfeleloAdat != null)
            {
                Console.WriteLine("Mesevár óvodához légvonalban legközelebbi tehermentes ingatlan adatai:");
                Console.WriteLine($"\tEladó neve      : {megfeleloAdat.Seller.Name}");
                Console.WriteLine($"\tEladó telefonja : {megfeleloAdat.Seller.Phone}");
                Console.WriteLine($"\tAlapterület     : {megfeleloAdat.Area}");
                Console.WriteLine($"\tSzobák száma    : {megfeleloAdat.Rooms}");
            }
            else
            {
                Console.WriteLine("Nincs megfelelő ingatlan az adatok között.");
            }


        }
    }
}

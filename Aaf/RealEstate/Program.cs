namespace RealEstate
{
    internal class Program
    {
        static void Main(string[] args)
        {
            List <Ad> adatok = Ad.LoadFromCsv("realestates.csv");

            Console.WriteLine($"Sikeresen beolvasva {adatok.Count}");


        }
    }
}

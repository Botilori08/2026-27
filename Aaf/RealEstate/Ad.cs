using System;
using System.Collections.Generic;
using System.Text;
using System.IO;

namespace RealEstate
{
    internal class Ad
    {
        public int Area { get; set; }
        public Category Category { get; set; }
        public DateTime CreateAt { get; set; }
        public string Description { get; set; }
        public int Floors { get; set; }
        public bool FreeOfCharge { get; set; }
        public int Id { get; set; }
        public string ImageUrl { get; set; }
        public string LatLong { get; set; }
        public int Rooms { get; set; }
        public Seller Seller { get; set; }


        public Ad(string csvSor)
        {
            string[] adatok = csvSor.Split(';');

            this.Id = int.Parse(adatok[0]);
            this.Rooms = int.Parse(adatok[1]);

            this.LatLong = adatok[2];

            this.Floors = int.Parse(adatok[3]);


            this.Area = int.Parse(adatok[4]);

            this.Description = adatok[5];

            this.FreeOfCharge = adatok[6] == "1";

            this.ImageUrl = adatok[7];

            this.CreateAt = DateTime.Parse(adatok[8]);

            this.Seller = new Seller
            {
                Id = int.Parse(adatok[9]),
                Name = adatok[10],
                Phone = adatok[11]
            };

            this.Category = new Category
            {
                Id = int.Parse(adatok[12]),
                Name = adatok[13]
            };
        }
        public static List<Ad> LoadFromCsv(string fileName)
        {
            List<Ad> ads = new List<Ad>();

            if (File.Exists(fileName))
            {
                string[] sorok = File.ReadAllLines(fileName);

                for (int i = 1; i < sorok.Length; i++)
                {
                    ads.Add(new Ad(sorok[i]));
                }
            }

            return ads;
        }

        public double DistanceTo(double a , double b)
        {
            double sajatA = double.Parse(this.LatLong.Split(",")[0],System.Globalization.CultureInfo.InvariantCulture);
            double sajatB = double.Parse(this.LatLong.Split(",")[1],System.Globalization.CultureInfo.InvariantCulture);

            double aKulonbseg = sajatA - a;
            double bKulonbseg = sajatB - b;

            return Math.Sqrt(Math.Pow(aKulonbseg,2) + Math.Pow(bKulonbseg,2));

        }
    }
}

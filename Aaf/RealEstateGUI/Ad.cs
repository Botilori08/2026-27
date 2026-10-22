using System;
using System.Collections.Generic;
using System.Text;
using System.Windows;
using System.IO;

namespace RealEstateGUI
{
    class Ad
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
            this.Description = adatok[1];
            this.Rooms = int.Parse(adatok[2]);
            this.Area = int.Parse(adatok[3]);
            this.Floors = int.Parse(adatok[4]);

            this.Category = new Category
            {
                Id = int.Parse(adatok[5]),
                Name = adatok[6]
            };

            this.Seller = new Seller
            {
                Id = int.Parse(adatok[7]),
                Name = adatok[8],
                Phone = adatok[9]
            };

            this.FreeOfCharge = bool.Parse(adatok[10]);

            this.ImageUrl = adatok[11];

            this.LatLong = adatok[12];

            this.CreateAt = DateTime.Parse(adatok[13]);
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
            else
            {
                Console.WriteLine($"A {fileName} nevű fájl nem található!");
            }

            return ads;
        }
    
    }
}

namespace Feladat09._18
{
    internal class Program
    {
        static void Main(string[] args)
        {
            int[] magassagok = { 150, 153, 167, 180, 186, 186, 190, 164, 163, 170, 181,175, 169 };

            int[] rendezett = magassagok.OrderByDescending(e => e).ToArray();

            Console.WriteLine("1. feladat");
            Console.WriteLine("Csökkenő sorrendben:");
            foreach (int i in rendezett)
            {
                Console.WriteLine(i +" cm");
            }

            int legalacsonyabb = magassagok[0];
            int legmagasabb = 0;
            for(int i = 0;i < magassagok.Length;i++)
            {
                if (magassagok[i] >legmagasabb)
                {
                    legmagasabb = magassagok[i];
                }
                if (magassagok[i] < legalacsonyabb)
                {
                    legalacsonyabb = magassagok[i];
                }
            }


            Console.WriteLine("2. feladat");
            Console.WriteLine($"Legmagasabb  és a legalacsonyabb diák közti különbség: {legmagasabb-legalacsonyabb} cm");

            bool vanAzonos = false;
            int szam = magassagok[0];
            for (int i = 1; i < magassagok.Length; i++)
            {
                if(magassagok[i] == szam)
                {
                    vanAzonos = true;
                    break;
                }
                else
                {
                    szam = magassagok[i];
                }
            }

            Console.WriteLine("3.feladat");
            if(vanAzonos)
            {
                Console.WriteLine("Van két azonos magasság");
            }
            else
            {
                Console.WriteLine("Nincs két azonos magasság");
            }

            Console.WriteLine("4.feladat");
            
            for (int i = legalacsonyabb; i <= legmagasabb; i++)
            {
                int darab = 0;
                for (int j = 0; j < magassagok.Length; j++)
                {
                    if(i == magassagok[j])
                    {
                        darab++;
                    }
                }
                
                Console.WriteLine($"{i} : {darab}");

                
                

            }




        }
    }
}

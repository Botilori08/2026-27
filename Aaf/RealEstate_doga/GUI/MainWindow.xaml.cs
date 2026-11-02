using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.IO;

namespace RealEstateGUI
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        List <Ad> adatok = new List <Ad> ();


        public MainWindow()
        {
            InitializeComponent();
            betoltes();
        }

        public void betoltes()
        {
            string[] sorok = File.ReadAllLines("realestates.csv");

            for(int i = 1;i < sorok.Length;i++)
            {
                adatok.Add(new Ad(sorok[i]));
            }

            Eladok.ItemsSource = adatok.Select(e => e.Seller.Name);



        }

        private void Eladok_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            string nev = Eladok.SelectedItem.ToString();

            eladoNev.Content = nev;

            eladoTelefonszam.Content= adatok.Where(e => e.Seller.Name == nev).Select(e => e.Seller.Phone).First().ToString();



        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            hirdetesekSzama.Content = "";

            string nev = Eladok.SelectedItem.ToString();

            hirdetesekSzama.Content = adatok.Where(e => e.Seller.Name == nev).Count();
        }
    }
}
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
        }

        public void betoltes()
        {
            string[] sorok = File.ReadAllLines("realestates.csv");

            foreach (var item in sorok)
            {
                adatok.Add(new Ad(item));
            }



        }
    }
}
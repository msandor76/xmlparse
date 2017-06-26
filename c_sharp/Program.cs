using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml;

namespace ProductXmlParseConsole
{
    class Program
    {
        static void Main(string[] args)
        {
            string htmlUl = "<ul>";
            XmlDocument doc = new XmlDocument();
            doc.Load(@"products.xml");

            XmlNodeList nodes = doc.DocumentElement.SelectNodes("/Products/Product");

            List<Product> products = new List<Product>();

            foreach (XmlNode node in nodes)
            {
                Product product = new Product();

                product.name = node.SelectSingleNode("Name").InnerText;
                product.id = node.SelectSingleNode("Id").InnerText;

                products.Add(product);
                Console.WriteLine($"Termékneve: {product.name}");
                htmlUl += "<li>" + product.name + "</li>";
                // RelId
                //insertTo();
            }
            htmlUl += "</ul>";
            createHtml(htmlUl);
            Console.WriteLine("Total product: " + products.Count);
            Console.ReadKey();
        }

        public static void createHtml(string html)
        {
            string path = @"list.html"; // c:\temp\list.html

            try
            {
                if (File.Exists(path))
                {
                    File.Delete(path);
                }

                using (FileStream fs = File.Create(path))
                {
                    Byte[] info = new UTF8Encoding(true).GetBytes(html);
                    fs.Write(info, 0, info.Length);
                }

                using (StreamReader sr = File.OpenText(path))
                {
                    string s = "";
                    while ((s = sr.ReadLine()) != null)
                    {
                        Console.WriteLine(s);
                    }
                }
            }

            catch (Exception ex)
            {
                Console.WriteLine(ex.ToString());
            }
        }

        /*
        static void insertTo()
        {
            try
            {
                string connectionString = "server=.;" + "initial catalog=xml_parse;" + "user id=root;" + "password=";
                using (SqlConnection conn =
                    new SqlConnection(connectionString))
                {
                    conn.Open();
                    using (SqlCommand cmd =
                        new SqlCommand("INSERT INTO products VALUES(" + "@product_id, @name)", conn))
                    {
                        cmd.Parameters.AddWithValue("@product_id", product.id);
                        cmd.Parameters.AddWithValue("@name", product.name);

                        int rows = cmd.ExecuteNonQuery();

                        //rows number of record got inserted
                    }
                }
            }
            catch (SqlException ex)
            {
                //Log exception
                //Display Error message
            }
        }
        */
    }



    class Product
    {
        public string id;
        public string name;
    }

}// end of Namespace

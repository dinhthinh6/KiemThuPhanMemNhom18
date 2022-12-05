/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package selenium_new;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import static selenium_new.QLSP_2.driver;

/**
 *
 * @author MINH TOAN
 */
public class QLSP_1 {
    static WebDriver driver;
    
        public static void main(String[] args) throws InterruptedException {
            System.setProperty("webdriver.chrome.driver","C:\\selenium\\chromedriver.exe");  
            driver=new ChromeDriver();
            driver.get("http://localhost:8080/ecommerce/customers/index.php");
            System.out.println("Page title is "+driver.getTitle());
            //driver.quit();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Đăng Nhập")).click();
            Thread.sleep(1000);
            driver.findElement(By.name("login_username")).sendKeys("bingan");
            Thread.sleep(1000);
            driver.findElement(By.name("login_password")).sendKeys("bingan");
            Thread.sleep(1000);
            driver.findElement(By.name("login")).click();
            driver.findElement(By.linkText("Admin")).click();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Thêm Sản Phẩm")).click();
            Thread.sleep(1000);
            driver.findElement(By.name("product_title")).sendKeys("");
            Thread.sleep(1000);
            driver.findElement(By.name("product_price")).sendKeys("");
            Thread.sleep(1000);
            driver.findElement(By.name("product_quantity")).sendKeys("");
            Thread.sleep(1000);
            //driver.findElement(By.id("image")).sendKeys("");
            driver.findElement(By.name("add_product")).click();
            Thread.sleep(500);
            driver.quit();
        
        }
}

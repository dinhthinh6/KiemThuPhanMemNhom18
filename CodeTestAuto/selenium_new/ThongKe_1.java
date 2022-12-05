/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package selenium_new;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

/**
 *
 * @author MINH TOAN
 */
public class ThongKe_1 {
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
            driver.findElement(By.name("login_username")).sendKeys("toan123456");
            Thread.sleep(1000);
            driver.findElement(By.name("login_password")).sendKeys("123456");
            Thread.sleep(1000);
            driver.findElement(By.name("login")).click();
            driver.findElement(By.linkText("Admin")).click();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Dashboard")).click();
            System.out.println(driver.findElement(By.xpath("/html/body/div/div[2]/div/div[3]/div")).getText());
            Thread.sleep(1000);
            //driver.quit();
            driver.get("http://localhost:8080/ecommerce/customers/index.php");
            //driver.quit();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Juvenate")).click(); 
            driver.findElement(By.name("add_to_cart")).click(); 
            WebElement name = driver.findElement(By.name("fullname"));
            name.sendKeys("Trần Minh Toàn");
            WebElement sdt = driver.findElement(By.name("numberphone"));
            sdt.sendKeys("012345678");
            WebElement diachi = driver.findElement(By.name("address"));
            diachi.sendKeys("HCM");
            driver.findElement(By.name("click_order")).click();
            driver.findElement(By.linkText("Admin")).click();
            Thread.sleep(1000);
            driver.findElement(By.linkText("Dashboard")).click();
            System.out.println(driver.findElement(By.xpath("/html/body/div/div[2]/div/div[3]/div")).getText());
            Thread.sleep(1000);
            driver.quit();
        }
}

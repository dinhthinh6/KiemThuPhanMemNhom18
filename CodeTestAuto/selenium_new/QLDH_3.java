/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package selenium_new;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

/**
 *
 * @author MINH TOAN
 */
public class QLDH_3 {
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
            driver.findElement(By.linkText("Đơn Hàng")).click();
            Thread.sleep(1000);
            driver.findElement(By.className("Đang xử lý")).click();
            Thread.sleep(1000);
            driver.findElement(By.className("Đã thanh toán")).click();
            Thread.sleep(500);
            driver.quit();
        
        }
}

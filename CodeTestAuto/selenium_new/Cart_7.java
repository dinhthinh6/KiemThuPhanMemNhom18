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
public class Cart_7 {
    static WebDriver driver;
    
        public static void main(String[] args) throws InterruptedException {
            System.setProperty("webdriver.chrome.driver","C:\\selenium\\chromedriver.exe");  
            driver=new ChromeDriver();
            driver.get("http://localhost:8080/ecommerce/customers/index.php");
            System.out.println("Page title is "+driver.getTitle());
            driver.findElement(By.linkText("Đăng Nhập")).click();
            Thread.sleep(500);
            WebElement tk = driver.findElement(By.name("login_username"));
            tk.sendKeys("toan");
            Thread.sleep(500);
            WebElement mk = driver.findElement(By.name("login_password"));
            mk.sendKeys("123");
            driver.findElement(By.name("login")).click();
            driver.findElement(By.linkText("Juvenate")).click(); 
            Thread.sleep(1000);
            driver.findElement(By.name("add_to_cart")).click(); 
            Thread.sleep(1000);
            driver.findElement(By.className("shadow-sm")).click();
            Thread.sleep(1000);
            driver.findElement(By.className("shadow-sm")).clear();
            Thread.sleep(1000);
            driver.findElement(By.className("shadow-sm")).sendKeys("10");
            Thread.sleep(1000);
            driver.findElement(By.name("update")).click();
            Thread.sleep(1000);
            //driver.quit();
        }
}

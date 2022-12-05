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
public class TK_1 {
    static WebDriver driver;
        public static void main(String[] args) throws InterruptedException {
            System.setProperty("webdriver.chrome.driver","C:\\selenium\\chromedriver.exe");  
            driver=new ChromeDriver();
            driver.get("http://localhost:8080/ecommerce/customers/index.php");
            System.out.println("Page title is "+driver.getTitle());
            driver.findElement(By.linkText("Cửa Hàng")).click(); 
            Thread.sleep(1000);
            WebElement tk = driver.findElement(By.name("search_value"));
            Thread.sleep(1000);
            tk.sendKeys("Track Jacket");
            Thread.sleep(1000);
            driver.findElement(By.name("search")).click();
            Thread.sleep(1000);
            //driver.quit();
        }
}

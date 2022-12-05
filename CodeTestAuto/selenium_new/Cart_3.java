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
public class Cart_3 {
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
            driver.findElement(By.name("add_to_cart")).click(); 
            WebElement name = driver.findElement(By.name("fullname"));
            name.sendKeys("Trần Minh Toàn");
            WebElement sdt = driver.findElement(By.name("numberphone"));
            sdt.sendKeys("012345678");
            WebElement diachi = driver.findElement(By.name("address"));
            diachi.sendKeys("HCM");
            driver.findElement(By.name("click_order")).click();
            if(driver.findElement(By.className("text-orange-300")).isDisplayed()){
                System.out.println("pass");
            }
            else{
               System.out.println("fail"); 
            }
            Thread.sleep(1000);
            driver.quit();
        }
}

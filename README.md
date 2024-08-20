簡易購物網站
===

環境：WinNMP

_PHP_MySqli.rar、bootstrap-5.1.3-dist.rar，一個是關於資料庫的處理函式，另一個關於排版的。和圖片檔都要解壓縮放在WWW資料夾裡，
其他.php檔都是程式碼，也是放在WWW裡。

## 程式碼部分節錄

### index.php
![index](https://github.com/user-attachments/assets/d2eacfe2-6f01-41ad-b716-0c927c5c7c09)
 網站基礎功能，如：回到首頁、登入登出、會員資料頁面、購物車
 商品展示：隨機展示商品、依商品分類展示、排序商品

### function.php / 資料庫存取增減
![image](https://github.com/user-attachments/assets/ba2a0c71-0313-4472-b8ac-42f513bcbfd4)
  存取商品資料並排序、存取會員資料、修改購物車、存取訂單等等

### db_connect.php / 資料庫使用
![image](https://github.com/user-attachments/assets/e0a43279-fafc-435d-a877-755d899172df)

![image](https://github.com/user-attachments/assets/223c207c-4f7d-4139-bac4-d6df5c939a5a)

### 
## 資料庫
![image](https://github.com/user-attachments/assets/6702578c-0f06-47e1-a0c0-a97f75fdcafd)

### 購物車
![image](https://github.com/user-attachments/assets/f0ffda66-19c0-42e4-8d4b-b3de635c8a03)
  每筆購物車資料的ID、擁有該購物車資料的會員ID、商品ID、商品名稱、商品單價、該筆購物車資料狀態（0代表已經被刪除或清空）
### 會員
![image](https://github.com/user-attachments/assets/15c41df9-25a0-4377-b0ad-f2e8a8c1014e)
  會員ID、帳號、密碼（沒有加密）、名字、電子郵件

### 商品
### 訂單
![image](https://github.com/user-attachments/assets/88d95563-f5a7-4a26-ac94-c9f72683b97f)

## 網站功能展示

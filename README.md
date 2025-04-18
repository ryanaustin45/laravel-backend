Project API
A. endpoint login
B. endpoint CRUD user login
C. endpoint cari data dari NAMA = Turner Mia
D. endpoint cari data dari NIM = 9352078461
E. endpoint cari data dari YMD = 20230405

Tools:
Framework                :Laravel versi 8^,
Database client version  :libmysql - mysqlnd 8.2.12 (file database terdapat pada folder Database)
Tambahan                 :https://jwt.io/

Dokumentasi postman
A. Endpoint login mengembalikan token 
![image](https://github.com/user-attachments/assets/e362e7b7-8e9e-475c-9c11-3e4d85b42779)

B. Endpoint CRUD user login atau register, dengan autentikasi dari token yang didapat berdasarkan login sebelumnya
![image](https://github.com/user-attachments/assets/88ec1ca2-8374-4127-bb79-d3cbfc87255d)

C. endpoint cari data dari NAMA = Turner Mia, dengan autentikasi dari token yang didapat berdasarkan login sebelumnya
![image](https://github.com/user-attachments/assets/354f12ec-783a-4596-8aae-17801a94c139)

D. endpoint cari data dari NIM = 9352078461, dengan autentikasi dari token yang didapat berdasarkan login sebelumnya
![image](https://github.com/user-attachments/assets/adc567e3-71bd-4b58-8a31-c9845836b28d)

E. endpoint cari data dari YMD = 20230405, dengan autentikasi dari token yang didapat berdasarkan login sebelumnya
![image](https://github.com/user-attachments/assets/f81da2ac-8fd8-4491-8bc9-0513db0a539f)

Router tambahan lainnya:
/api/auth/me : Menampilkan Info User 
![image](https://github.com/user-attachments/assets/66644642-39f2-469a-b396-48c3dc30691a)

/api/auth/refresh : Melakukan Refresh Token
![image](https://github.com/user-attachments/assets/b7bf638f-d9d4-4769-9af2-90f352191c32)

/api/auth/logout : Melakukan Logout, Menghapus Token
![image](https://github.com/user-attachments/assets/dc02fc3d-45e0-49a9-b6e8-ad4afa5f7ab2)




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
# System Overview  
The ticket management system is built using the **Laravel PHP framework** and implements a traditional **MVC (Model-View-Controller)** architecture with an additional **service layer** for business logic encapsulation.  

The application provides a **web-based interface** for ticket lifecycle management, including:
- Creation
- Editing
- Status tracking
- Collaborative commenting

---

# Key Capabilities

| Feature            | Description                          | Access Level   |
|--------------------|--------------------------------------|----------------|
| **Ticket Management** | Create, edit, view, delete tickets   | User/Admin     |
| **Status Control**    | Toggle ticket open/closed state      | Admin only     |
| **Comment System**    | Add comments to tickets              | Verified users |
| **Dashboard Analytics** | View ticket metrics and statistics  | Admin only     |
| **Role-based Access** | User and admin role differentiation  | System-wide    |

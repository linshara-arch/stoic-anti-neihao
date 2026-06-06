# 🌱 Stoic Anti-Neihao (斯多葛反内耗树洞)

![License](https://img.shields.io/badge/License-MIT-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4.svg)
![Docker](https://img.shields.io/badge/Docker-Supported-2496ED.svg)

[English](#english) | [简体中文](#简体中文)

---

## English

### 📖 Introduction
"Stoic Anti-Neihao" is an ultra-lightweight, database-free, and fully anonymous message board system designed for modern individuals facing anxiety and mental friction ("Neihao" in Chinese internet slang). 

Based on the core dichotomy of control in Stoicism—focusing only on what we can control and accepting what we cannot—this project provides a minimalist "digital sanctuary." Visitors can leave their thoughts without registration, logging in, or dealing with social pressure.

### ✨ Features
* **Zero Dependencies:** Pure PHP implementation, no MySQL/PostgreSQL required. Data is stored securely in local JSON files.
* **Absolute Anonymity:** No login modules, no user tracking. Just a text box and a publish button.
* **One-Click Deployment:** Fully containerized with Docker, deployable on any VPS in seconds.

### 🚀 Quick Start (Docker)

```bash
# Clone the repository
git clone [https://github.com/linshara-arch/stoic-anti-neihao.git](https://github.com/linshara-arch/stoic-anti-neihao.git)

# Enter the directory
cd stoic-anti-neihao

# Start the service using Docker Compose
docker-compose up -d
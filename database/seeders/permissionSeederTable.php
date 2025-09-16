<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class permissionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // 🟢 إدارة المستخدمين
            'view users', 'create user', 'edit user', 'delete user',
            'manage roles', 'assign roles',
            
            // 🟢 إدارة الطلبات
            'view orders', 'manage orders', 'update order status', 'cancel order',
        
            // 🟢 إدارة المطاعم
            'view restaurants', 'manage restaurants', 'create restaurant', 'edit restaurant', 'delete restaurant',
            
            // 🟢 إدارة المنتجات
            'view products', 'manage products', 'create product', 'edit product', 'delete product',
        
            // 🟢 إدارة عمليات التوصيل
            'view deliveries', 'manage deliveries', 'assign delivery', 'track delivery', 'update delivery status',
        
            // 🟢 إدارة الدفع والمعاملات المالية
            'view payments', 'manage payments', 'refund payment', 'view transactions',
        
            // 🟢 إدارة التقارير والإحصائيات
            'view reports', 'generate reports', 'export reports',
        
            // 🟢 إدارة الإعلانات والعروض الترويجية
            'view promotions', 'manage promotions', 'create promotion', 'edit promotion', 'delete promotion',
        
            // 🟢 إعدادات النظام
            'manage settings', 'update settings', 'view logs', 'backup system'
        ];
        

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

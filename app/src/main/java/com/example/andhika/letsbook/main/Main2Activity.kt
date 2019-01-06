package com.example.andhika.letsbook.main

import android.support.design.widget.NavigationView
import android.support.design.widget.Snackbar
import android.support.v4.app.Fragment
import android.support.v4.view.GravityCompat
import android.support.v7.app.ActionBarDrawerToggle
import android.view.Menu
import android.view.MenuItem
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.fragment.content.ContentFragment
import com.example.andhika.letsbook.fragment.ticket.TicketFragment
import com.example.andhika.letsbook.fragment.topup.TopUpFragment
import com.example.andhika.letsbook.fragment.transaksi.TransaksiFragment
import kotlinx.android.synthetic.main.activity_main2.*
import kotlinx.android.synthetic.main.app_bar_main2.*

class Main2Activity : BaseActivity(), NavigationView.OnNavigationItemSelectedListener {

    val fragment = ContentFragment()

    override fun onSetupLayout() {
        setContentView(R.layout.activity_main2)
    }

    override fun onViewReady() {
        setSupportActionBar(toolbar)

        fab.setOnClickListener { view ->
            Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                .setAction("Action", null).show()
        }

        val toggle = ActionBarDrawerToggle(
            this, drawer_layout, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close
        )
        drawer_layout.addDrawerListener(toggle)
        toggle.syncState()
        supportFragmentManager.beginTransaction().replace(R.id.cl_content, fragment).commit()

        nav_view.setNavigationItemSelectedListener(this)
    }


    override fun onBackPressed() {
        if (drawer_layout.isDrawerOpen(GravityCompat.START)) {
            drawer_layout.closeDrawer(GravityCompat.START)
        } else {
            super.onBackPressed()
        }
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        // Inflate the menu; this adds items to the action bar if it is present.
        menuInflater.inflate(R.menu.main2, menu)
        return true
    }


    override fun onNavigationItemSelected(item: MenuItem): Boolean {
        // Handle navigation view item clicks here.
        val fragment : Fragment  = when (item.itemId) {
            R.id.nav_home -> {
                ContentFragment()
            }
            R.id.nav_ticket -> {
                TicketFragment()
            }
            R.id.nav_refund -> {
                ContentFragment()
            }
            R.id.nav_transaksi -> {
                TransaksiFragment()

            }
            else -> {
                TopUpFragment()

            }

        }
        supportFragmentManager.beginTransaction().replace(R.id.cl_content, fragment).commit()
        drawer_layout.closeDrawer(GravityCompat.START)
        return true
    }
}

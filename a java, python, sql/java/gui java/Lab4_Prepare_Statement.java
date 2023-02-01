





import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import javax.swing.table.DefaultTableModel;
import java.sql.*;

public class  Lab4_Prepare_Statement extends JFrame implements ActionListener
{
	JTabbedPane tp;
	JPanel show;
	JPanel insert;
	JPanel update;
	JPanel delete;
	
	// compoennt show
	JButton btn_referesh;
	private JTable tbldisplay;
	private JScrollPane pane;
	final DefaultTableModel modelTable;
	
	// component insert
	
	JLabel lbl_judul;
	JLabel lbl_pengarang;
	
	JTextField tf_judul;
	JTextField tf_pengarang;
	
	JButton btn_insert;
	
	// component update 
	
	JLabel lbl_set_judul;
	JLabel lbl_where_id_buku;
	JLabel lbl_set_pengarang;
	
	JTextField tf_set_judul;
	JTextField tf_where_id_buku;
	JTextField tf_set_pengarang;
	
	JButton btn_update;
	
	// component delete
	
	JLabel lbl_where_id_buku_delete;
	JTextField tf_where_id_buku_delete;
	JButton btn_delete;
	
	
	Connection conn = null;
	PreparedStatement st = null;
	ResultSet rs = null;
	
	// constructor
	public Lab4_Prepare_Statement()
	{
		 tp = new JTabbedPane();
		
		show = new JPanel(null);
		insert = new JPanel(null);
		update = new JPanel(null);
		delete = new JPanel(null);
		
		tp.add("show buku",show);
		tp.add("insert book",insert);
		tp.add("update book",update);
		tp.add("delete book",delete);
		
		add(tp);
		
		
		// create table model 
		Object[] column = {"id buku","judul","pengarang"};
		//initialize
		modelTable = new DefaultTableModel();
		modelTable.setColumnIdentifiers(column);
				
		tbldisplay = new JTable();
		tbldisplay.setModel(modelTable);
				
		pane = new JScrollPane(tbldisplay);
		pane.setPreferredSize(new Dimension(700,300));
				
		show.add(pane);
		pane.setBounds(50, 50, 300, 300);
		
		btn_referesh = new JButton("REFERESH");
		show.add(btn_referesh);
		btn_referesh.setBounds(150, 360, 100, 25);
		btn_referesh.addActionListener(this);
		
		
		///////////////////////////////////////////////////////////////////
		
		JLabel lbl_insert_title = new JLabel("MASUKKAN BUKU");
		insert.add(lbl_insert_title);
		lbl_insert_title.setBounds(130, 10, 150, 25);
		
		lbl_judul = new JLabel("JUDUL              :");
		insert.add(lbl_judul);
		lbl_judul.setBounds(50, 50, 100, 25);
		
		tf_judul = new JTextField(8);
		insert.add(tf_judul);
		tf_judul.setBounds(150, 50, 200, 75);
		
		lbl_pengarang = new JLabel("PENGARANG :");
		insert.add(lbl_pengarang);
		lbl_pengarang.setBounds(50, 150, 100, 25);
		
		tf_pengarang = new JTextField(8);
		insert.add(tf_pengarang);
		tf_pengarang.setBounds(150, 150, 200, 25);
		
		btn_insert = new JButton("INSERT");
		insert.add(btn_insert);
		btn_insert.setBounds(150, 200, 100, 25);
		btn_insert.addActionListener(this);
		
		////////////////////////////////////////////////////////////////////////
		
		JLabel lbl_update_title = new JLabel("KEMASKINI BUKU ");
		update.add(lbl_update_title);
		lbl_update_title.setBounds(130, 10, 150, 25);
		
		lbl_where_id_buku = new JLabel("tukar kepada buku id : ");
		update.add(lbl_where_id_buku);
		lbl_where_id_buku.setBounds(30, 50, 150, 25);
		
		tf_where_id_buku = new JTextField(8);
		update.add(tf_where_id_buku);
		tf_where_id_buku.setBounds(200, 50, 50, 25);
		
		lbl_set_judul = new JLabel("tukarkan judul kepada :");
		update.add(lbl_set_judul);
		lbl_set_judul.setBounds(30, 80, 150, 25);
		
		tf_set_judul = new JTextField(8);
		update.add(tf_set_judul);
		tf_set_judul.setBounds(200, 80, 200, 75);
		
		lbl_set_pengarang = new JLabel("tukarkan pengarang kepada :");
		update.add(lbl_set_pengarang);
		lbl_set_pengarang.setBounds(30, 170, 200, 25);
		
		tf_set_pengarang = new JTextField(8);
		update.add(tf_set_pengarang);
		tf_set_pengarang.setBounds(200, 170, 200, 50);
		
		btn_update = new JButton("UPDATE");
		update.add(btn_update);
		btn_update.addActionListener(this);
		btn_update.setBounds(200, 250, 100, 25);
		
		/////////////////////////////////////////////////////
		
		JLabel lbl_delete_title = new JLabel("BUANG BUKU");
		delete.add(lbl_delete_title);
		lbl_delete_title.setBounds(130, 10, 150, 25);
		
		lbl_where_id_buku_delete = new JLabel("buang buku id : ");
		delete.add(lbl_where_id_buku_delete);
		lbl_where_id_buku_delete.setBounds(30, 50, 150, 25);
		
		tf_where_id_buku_delete = new JTextField(8);
		delete.add(tf_where_id_buku_delete);
		tf_where_id_buku_delete.setBounds(130, 50, 50, 25);
		
		btn_delete = new JButton("DELETE");
		delete.add(btn_delete);
		btn_delete.addActionListener(this);
		btn_delete.setBounds(130, 100, 100, 25);
		
	}// end constructor 
	
	

	
	public void actionPerformed(ActionEvent e)
	{
		
		if(e.getSource() == btn_referesh)
		{
			referesh();
		}
		
		if(e.getSource() == btn_insert)
		{
			insert_buku();
		}
		
		if(e.getSource() == btn_update)
		{
			update_buku();
		}
		
		if(e.getSource() == btn_delete)
		{
			delete_buku();
		}
		
	}//end event 
	
	public void referesh()
	{
		String sql = "select * from buku";
		
		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/perpustakaandb","root","");
			st = conn.prepareStatement(sql);
			
			rs = st.executeQuery();
			
			modelTable.getDataVector().removeAllElements();
			
			while(rs.next())
			{
				modelTable.addRow(new Object[]{rs.getInt(1),rs.getString(2),rs.getString(3)});
			}
			
		}
		catch(SQLException ea)
		{
			JOptionPane.showMessageDialog(null," SQL PROBLEM !!!!! " + ea);
		}
		catch(Exception e)
		{
			JOptionPane.showMessageDialog(null," error " + e);
		}
		finally
		{
			try
			{
				if(conn != null)
				{
					conn.close();
					conn = null;
				}
				if(st != null)
				{
					st.close();
					st = null;
				}
				if(rs != null)
				{
					rs.close();
					rs = null;
				}
			}
			catch(Exception e)
			{
				
			}
			
		}
	}

	
	public void insert_buku()
	{
		
		String judul =(String) tf_judul.getText();
		String pengarang =(String) tf_pengarang.getText();
		
		
		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/perpustakaandb","root","");
			String sql = "INSERT INTO buku(judul,pengarang) VALUES(?,?)";
			st = conn.prepareStatement(sql);
			
			st.setString(1, judul);
			st.setString(2, pengarang);
			
			int x = st.executeUpdate();
			
			JOptionPane.showMessageDialog(null,x+" data insert " );
			
			tf_judul.setText("");
			tf_pengarang.setText("");
			
		}
		catch(SQLException ea)
		{
			JOptionPane.showMessageDialog(null," SQL PROBLEM !!!!! " + ea);
		}
		catch(Exception e)
		{
			JOptionPane.showMessageDialog(null," error " + e );
			
		}
		finally
		{
			try
			{
				if(conn != null)
				{
					conn.close();
					conn = null;
				}
				if(st != null)
				{
					st.close();
					st = null;
				}
				if(rs != null)
				{
					rs.close();
					rs = null;
				}
			}
			catch(Exception e)
			{
				
			}
			
		}// end finally
	}// end method
	
	public void update_buku()
	{
		int id = Integer.parseInt(tf_where_id_buku.getText());
		String judul =(String) tf_set_judul.getText();
		String pengarang =(String) tf_set_pengarang.getText();
		String sql = "update buku set judul = ?, pengarang = ? where id_buku = ?";
		
		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/perpustakaandb","root","");
			st = conn.prepareStatement(sql);
			
			st.setString(1, judul);
			st.setString(2, pengarang);
			st.setInt(3, id);
			
			
			int x = st.executeUpdate();
			
			JOptionPane.showMessageDialog(null,x+" buku dikemaskini " );
			
			tf_where_id_buku.setText("");
			tf_set_pengarang.setText("");
			tf_set_judul.setText("");
			
		}
		catch(SQLException ea)
		{
			JOptionPane.showMessageDialog(null," SQL PROBLEM !!!!! " + ea);
		}
		catch(Exception e)
		{
			JOptionPane.showMessageDialog(null," error " + e );
		}
		finally
		{
			try
			{
				if(conn != null)
				{
					conn.close();
					conn = null;
				}
				if(st != null)
				{
					st.close();
					st = null;
				}
				if(rs != null)
				{
					rs.close();
					rs = null;
				}
			}
			catch(Exception e)
			{
				
			}
		}//end finally
		
	}//end method
	
	public void delete_buku()
	{
		int id = Integer.parseInt(tf_where_id_buku_delete.getText());
		
		String sql = "delete from buku where id_buku = ?";
		
		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/perpustakaandb","root","");
			st = conn.prepareStatement(sql);
			
			st.setInt(1, id);
			
			int x = st.executeUpdate();
			
			JOptionPane.showMessageDialog(null,x+" buku dibuang " );
			
			tf_where_id_buku_delete.setText("");
		
			
		}
		catch(SQLException ea)
		{
			JOptionPane.showMessageDialog(null," SQL PROBLEM !!!!! " + ea );
		}
		catch(Exception e)
		{
			JOptionPane.showMessageDialog(null," error " + e );
		}
		finally
		{
			try
			{
				if(conn != null)
				{
					conn.close();
					conn = null;
				}
				if(st != null)
				{
					st.close();
					st = null;
				}
				if(rs != null)
				{
					rs.close();
					rs = null;
				}
			}
			catch(Exception e)
			{
				
			}
		}//end finally
		
	}//end method
	
	public static void main(String args[])
	{
		 Lab4_Prepare_Statement f = new  Lab4_Prepare_Statement();
		
		f.setTitle("perpustakaan");
		f.setVisible(true);
		f.setSize(450, 460);
		f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
	}//end main method

}// end class

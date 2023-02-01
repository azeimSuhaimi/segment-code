
import java.awt.*;
import javax.swing.*;
import javax.swing.table.DefaultTableModel;

import java.awt.event.*;

public class tableDemo extends JFrame implements ActionListener,ItemListener {
	
	
	private JLabel lblname,lbljabatan,lblprogram;
	private JTextField tf1;
	private JComboBox cbojabatan,cboprogram;
	private JTable tbldisplay;
	private JScrollPane pane;
	private JButton btn;
	final DefaultTableModel modelTable;
	
	public tableDemo()
	{
		super("table demo");
		
		String textjabatan[] = {"","jke","jtmk"};
		//String textprogram[] = {"","DEE","DEP","DNS","DDT"};
		
		tf1 = new JTextField(10);
		btn = new JButton("click");
		btn.addActionListener(this);
		
		lblname = new JLabel("nama");
		lbljabatan = new JLabel("jabatan");
		lblprogram = new JLabel("program");
		
		cbojabatan = new JComboBox(textjabatan);
		cbojabatan.addItemListener(this);
		cboprogram = new JComboBox();
		
		
		
		
		// create table model 
		Object[] column = {"name","jabatan","program"};
		//initialize
		modelTable = new DefaultTableModel();
		modelTable.setColumnIdentifiers(column);
		
		tbldisplay = new JTable();
		tbldisplay.setModel(modelTable);
		
		pane = new JScrollPane(tbldisplay);
		pane.setPreferredSize(new Dimension(400,300));
		
		
		JPanel p = new JPanel();
		add(p);
		p.add(lblname);
		p.add(tf1);
		p.add(lbljabatan);
		p.add(cbojabatan);
		p.add(lblprogram);
		p.add(cboprogram);
		p.add(btn);
		p.add(pane);
		
	}
	
	public void actionPerformed(ActionEvent e)
	{
		String name = tf1.getText();
		String jabatan =(String) cbojabatan.getSelectedItem();
		String program =(String) cboprogram.getSelectedItem();
		
		modelTable.addRow(new Object[]{name,jabatan,program});
	}
	
	public void itemStateChanged(ItemEvent e)
	{
		String text1 = cbojabatan.getSelectedItem();
		
		cboprogram.removeItem();
		
		if(text1.equals("jke"))
		{
			cboprogram.addItem("");
			cboprogram.addItem("DEP");
			cboprogram.addItem("DEE");
		}
		
		if(text1.equals("jtmk"))
		{
			cboprogram.addItem("");
			cboprogram.addItem("DNS");
			cboprogram.addItem("DDT");
		}
		
	}
	
	public static void main(String args[])
	{
		tableDemo f = new tableDemo();
		f.setVisible(true);
		f.setSize(500, 300);
	}

}
